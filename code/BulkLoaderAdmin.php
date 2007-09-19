<?php

/**
 * Class to provide batch-update facilities to CMS users.
 * The BulkLoaderAdmin class provides an interface for accessing all of the subclasses of BulkLoader,
 * each of which defines a particular bulk loading operation.
 * 
 * This code was originally developed for Per Week in collaboration with Brian Calhoun.
 */
class BulkLoaderAdmin extends LeftAndMain {

	/**
	 * Initialisation method called before accessing any functionality that BulkLoaderAdmin has to offer
	 */
	public function init() {
		Requirements::javascript('cms/javascript/BulkLoaderAdmin.js');
		
		parent::init();
	}
	
	/**
	 * Link function to tell us how to get back to this controller.
	 */
	public function Link($action = null) {
		return "admin/bulkload/$action";
	}
	
	public function BulkLoaders() {
			$items = ClassInfo::subclassesFor("BulkLoader");
			array_shift($items);
			
			foreach($items as $item) {
				$itemObjects[] = new $item();
			}
			
			return new DataObjectSet($itemObjects);
	}
	
	/**
	 * Return the form shown when we first click on a loader on the left.
	 * Provides all the options, a file upload, and an option to proceed
	 */	 
	public function getEditForm($className = null) {
		if(is_subclass_of($className, 'BulkLoader')) {
			$loader = new $className();
			
			$fields = $loader->getOptionFields();
			if(!$fields) $fields = new FieldSet();
			
			$fields->push(new FileField("File", "CSV File"));
			$fields->push(new HiddenField('LoaderClass', '', $loader->class));
			
			return new Form($this, "EditForm",
				$fields,
				new FieldSet(
					new FormAction('preview', "Preview")
				)
			);
			
		}
	}
	
	public function preview() {
		$className = $_REQUEST['LoaderClass'];
		if(is_subclass_of($className, 'BulkLoader')) {
			$loader = new $className();
			
			$results = $loader->processAll($_FILES['File']['tmp_name'], false);
			
			return $this->customise(array(
				"Message" => "Press continue to load this data in",
				"Results" => $results,
				"ConfirmForm" => $this->getConfirmFormFor($loader, $file),
			))->renderWith("BulkLoaderAdmin_preview");
		}
	}
	
	/**
	 * Generate a confirmation form for the given file/class
	 * Will copy the file to a suitable temporary location
	 * @param loader A BulkLoader object
	 * @param file The name of the temp file
	 */
	public function getConfirmFormFor($loader, $file) {
		$tmpFile = tempnam(TEMP_FOLDER,'batch-upload-');
		copy($file,$tmpFile);
		
		return new Form($this, "ConfirmForm", new FieldSet(
			new HiddenField("File", "", $tmpFile),
			new HiddenField("LoaderClass", "", $loader->class)
		), new FieldSet(
			new FormAction('process', 'Confirm bulk load')
		));		
	}
	/**
	 * Stub to return the form back after pressing the button.
	 */
	public function ConfirmForm() {
		$className = $_REQUEST['LoaderClass'];
		return $this->getConfirmFormFor(new $className(), $_REQUEST['File']);
	}
	
	/**
	 * Process the data and display the final "finished" message
	 */	
	public function process() {
		$className = $_REQUEST['LoaderClass'];
		if(is_subclass_of($className, 'BulkLoader')) {
			$loader = new $className();
			
			$results = $loader->processAll($_REQUEST['Filename'], true);
			
			return $this->customise(array(
				"Message" => "This data has been loaded in",
				"Results" => $results,
				"ConfirmForm" => " ",
			))->renderWith("BulkLoaderAdmin_preview");
		}
	}

}

?>