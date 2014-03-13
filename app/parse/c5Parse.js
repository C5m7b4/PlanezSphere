Ext.define('PlanezSphere.parse.c5Parse',{
    extend:'Ext.Component',
    alias:'widget.c5Parse',
    initComponent:function(){
        
    },
    parseAjax:function(response){
        try{
            var result = response.responseText;
            
            result = result.replace('{','');
            result = result.replace('}','');
                                    
            var responseArray = response.responseText.split(",");
            
            var message = responseArray[1];
            var codeArray = message.split(":");
            var code = codeArray[1].replace('"','');
            code = code.replace('}','');
            console.dir(code);
			
			//now check to see if we have an error or not
			if ( code == '0'){
				return true;
			} else {
				//now get the error message out of the json response
				var msg = responseArray[2];
				var smsg = msg.split(':');
				msg = smsg[1].replace(/\"/g,"");
				
				var errorcode = responseArray[3];
				var serrorcode = errorcode.split(':');				
				errorcode = serrorcode[1].replace(/\"/g,"");
				
				Ext.Msg.alert('Error',msg + ',Error: ' + errorcode);
				return false;
			}
            
        } catch (e){
            Ext.Msg.alert('Error','The Server returned an unknown error:510');
        }
    }
});