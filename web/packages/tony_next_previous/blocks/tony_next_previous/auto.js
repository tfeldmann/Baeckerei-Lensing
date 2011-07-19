var tonyNextPrevious ={ 

	init:function(){   
		$('input[name=linkStyle]').each(function(i,el){ 
			el.onclick=function(){ tonyNextPrevious.nextPrevLabelsShown(this); }
			el.onchange=function(){ tonyNextPrevious.nextPrevLabelsShown(this); }							   
		})
	},
	
	nextPrevLabelsShown:function(){
		var el=$('input[name="linkStyle"]:checked')
		var displayed=(el.val()=='next_previous')?'block':'none'; 
		$('#ccm_edit_pane_nextPreviousWrap').css('display',displayed);
	},
	
	validate:function(){
			var failed=0; 
			
			if(failed){
				ccm_isBlockError=1;
				return false;
			}
			return true;
	}, 
	
}

$(function(){ tonyNextPrevious.init(); });
 
ccmValidateBlockForm = function() { return tonyNextPrevious.validate(); }