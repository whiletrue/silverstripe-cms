if(typeof(ss) == 'undefined' || typeof(ss.i18n) == 'undefined') {
	if(typeof(console) != 'undefined') console.error('Class ss.i18n not defined');
} else {
	ss.i18n.addDictionary('cs_CZ', {
		'CMSMAIN.WARNINGSAVEPAGESBEFOREADDING' : "Před přidáním další podstránky, musíte stránku uložit",
		'CMSMAIN.CANTADDCHILDREN' : "Nemůžete přidat potomky do vybraného uzlu",
		'CMSMAIN.ERRORADDINGPAGE' : 'Chyba při přidání stránky',
		'CMSMAIN.FILTEREDTREE' : 'Filtrovaná struktura k zobrazení pouze zmeněných stránek',
		'CMSMAIN.ERRORFILTERPAGES' : 'Není možno filtrovat strukturu k zobrazení pouze zmeněných stránek<br />%s',
		'CMSMAIN.ERRORUNFILTER' : 'Není možno filtrovat strukturu webu<br />%s',
		'CMSMAIN.ERRORUNFILTER' : 'Nefiltrovaná struktura',
		'CMSMAIN.PUBLISHINGPAGES' : 'Zveřejňování stránek...',
		'CMSMAIN.SELECTONEPAGE' : "Prosím, vyberte nejméně 1 stránku.",
		'CMSMAIN.ERRORPUBLISHING' : 'Chyba při zveřejňování stránek',
		'CMSMAIN.REALLYDELETEPAGES' : "Skutečně chcete smazat %s označené stránky?",
		'CMSMAIN.DELETINGPAGES' : 'Mazání stránek...',
		'CMSMAIN.ERRORDELETINGPAGES': 'Chyba při mazání stránek',
		'CMSMAIN.PUBLISHING' : 'Zveřejňování...',
		'CMSMAIN.RESTORING': 'Obnovování...',
		'CMSMAIN.ERRORREVERTING': 'Chyba převádění na živý obsah',
		'CMSMAIN.SAVING' : 'ukládání...',
		'CMSMAIN.SELECTMOREPAGES' : "Máte vybráno %s stránek.\n\nSkutečně je chcete?",
		'ModelAdmin.SAVED': "Uloženo",
		'ModelAdmin.REALLYDELETE': "Skutečně chcete smazat?",
		'ModelAdmin.DELETED': "Smazáno",
		'LeftAndMain.PAGEWASDELETED': "Tato stránka byla smazána. Pro editaci stránky, vyberte ji vlevo.",
		'LeftAndMain.CONFIRMUNSAVED': "Určitě chcete opustit navigaci z této stránky?\n\nUPOZORNĚNÍ: Vaše změny nebyly uloženy.\n\nStlačte OK pro pokračovat, nebo Cancel, zůstanete na této stránce."
	});
}