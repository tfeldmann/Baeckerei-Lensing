var asmillerGalleryBlock = {
	
	init:function(){},	
	
	chooseImg:function(){ 
		ccm_launchFileManager('&fType=' + ccmi18n_filemanager.FTYPE_IMAGE);
	},
	
	showImages:function(){
		$("#asmillerGalleryBlock-imgRows").show();
		$("#asmillerGalleryBlock-chooseImg").show();
		$("#asmillerGalleryBlock-fsRow").hide();
	},

	showFileSet:function(){
		$("#asmillerGalleryBlock-imgRows").hide();
		$("#asmillerGalleryBlock-chooseImg").hide();
		$("#asmillerGalleryBlock-fsRow").show();
	},

	selectObj:function(obj){
		if (obj.fsID != undefined) {
			$("#asmillerGalleryBlock-fsRow input[name=fsID]").attr("value", obj.fsID);
			$("#asmillerGalleryBlock-fsRow input[name=fsName]").attr("value", obj.fsName);
			$("#asmillerGalleryBlock-fsRow .asmillerGalleryBlock-fsName").text(obj.fsName);
		} else {
			this.addNewImage(obj.fID, obj.thumbnailLevel1, obj.height, obj.title);
		}
	},

	addImages:0, 
	addNewImage: function(fID, thumbPath, imgHeight, title) { 
		this.addImages--; //negative counter - so it doesn't compete with real GalleryImgIds
		var GalleryImgId=this.addImages;
		var templateHTML=$('#imgRowTemplateWrap .asmillerGalleryBlock-imgRow').html().replace(/tempFID/g,fID);
		templateHTML=templateHTML.replace(/tempThumbPath/g,thumbPath);
		templateHTML=templateHTML.replace(/tempFilename/g,title);
		templateHTML=templateHTML.replace(/tempGalleryImgId/g,GalleryImgId).replace(/tempHeight/g,imgHeight);
		var imgRow = document.createElement("div");
		imgRow.innerHTML=templateHTML;
		imgRow.id='asmillerGalleryBlock-imgRow'+parseInt(GalleryImgId);	
		imgRow.className='asmillerGalleryBlock-imgRow';
		document.getElementById('asmillerGalleryBlock-imgRows').appendChild(imgRow);
		var bgRow=$('#asmillerGalleryBlock-imgRow'+parseInt(fID)+' .backgroundRow');
		bgRow.css('background','url('+thumbPath+') no-repeat left top');
	},
	
	removeImage: function(fID){
		$('#asmillerGalleryBlock-imgRow'+fID).remove();
	},
	
	moveUp:function(fID){
		var thisImg=$('#asmillerGalleryBlock-imgRow'+fID);
		var qIDs=this.serialize();
		var previousQID=0;
		for(var i=0;i<qIDs.length;i++){
			if(qIDs[i]==fID){
				if(previousQID==0) break; 
				thisImg.after($('#asmillerGalleryBlock-imgRow'+previousQID));
				break;
			}
			previousQID=qIDs[i];
		}	 
	},
	moveDown:function(fID){
		var thisImg=$('#asmillerGalleryBlock-imgRow'+fID);
		var qIDs=this.serialize();
		var thisQIDfound=0;
		for(var i=0;i<qIDs.length;i++){
			if(qIDs[i]==fID){
				thisQIDfound=1;
				continue;
			}
			if(thisQIDfound){
				$('#asmillerGalleryBlock-imgRow'+qIDs[i]).after(thisImg);
				break;
			}
		} 
	},
	serialize:function(){
		var t = document.getElementById("asmillerGalleryBlock-imgRows");
		var qIDs=[];
		for(var i=0;i<t.childNodes.length;i++){ 
			if( t.childNodes[i].className && t.childNodes[i].className.indexOf('asmillerGalleryBlock-imgRow')>=0 ){ 
				var qID=t.childNodes[i].id.replace('asmillerGalleryBlock-imgRow','');
				qIDs.push(qID);
			}
		}
		return qIDs;
	},	

	validate:function(){
		var failed=0; 
		
		if ($("#newImg select[name=type]").val() == 'FILESET')
		{
			if ($("#asmillerGalleryBlock-fsRow input[name=fsID]").val() <= 0) {
				alert(ccm_t('choose-fileset'));
				$('#asmillerGalleryBlock-AddImg').focus();
				failed=1;
			}	
		} else {
			qIDs=this.serialize();
			if( qIDs.length<2 ){
				alert(ccm_t('choose-min-2'));
				$('#asmillerGalleryBlock-AddImg').focus();
				failed=1;
			}	
		}
		
		if(failed){
			ccm_isBlockError=1;
			return false;
		}
		return true;
	} 
}

ccmValidateBlockForm = function() { return asmillerGalleryBlock.validate(); }
ccm_chooseAsset = function(obj) { asmillerGalleryBlock.selectObj(obj); }

$(function() {
	if ($("#newImg select[name=type]").val() == 'FILESET') {
		$("#newImg select[name=type]").val('FILESET');
		asmillerGalleryBlock.showFileSet();
	} else {
		$("#newImg select[name=type]").val('CUSTOM');
		asmillerGalleryBlock.showImages();
	}

	$("#newImg select[name=type]").change(function(){
		if (this.value == 'FILESET') {
			asmillerGalleryBlock.showFileSet();
		} else {
			asmillerGalleryBlock.showImages();
		}
	});
});

