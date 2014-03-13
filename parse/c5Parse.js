Ext.define('PlanezSphere.parse.c5Parse',{
    extend:'Ext.Component',
    alias:'widget.c5Parse',
    initComponent:function(){
        
    },
    parseAjax:function(response){
        try{
            console.dir(response);
            
            //clean things up just a little bit
            response = response.replace('{','');
            response = response.replace('}','');
            
            var result = response.responseText;
            var responseArray = response.responseText.split(",");
            console.dir(responseArray);
            
            var message = responseArray[1];
            console.dir(message);
            var codeArray = message.split(":");
            console.dir(codeArray);
            var code = codeArray[1].replace('"','');
            code = code.replace('}','');
            console.dir(code);
            switch(code)
            {
                case "0":
                    //document.location='_includes/debug.php';
                    break;
                case "1":
                    Ext.Msg.alert('Alert','Internal Error 501, NO Username Found');
                    break;
                case "2":
                    Ext.Msg.alert('Alert','Internal Error 502, No Password found');
                    break;
                case "3":
                    Ext.Msg.alert('Alert','Internal Error 503, User not found');
                    break;
                case "4":
                    Ext.Msg.alert('Alert','Internal Error 504, Bad Username');
                    break;
                case "5":
                    Ext.Msg.alert('Alert','Internal Error 505, Bad Password');
                    break;
                case "10":
                    //forgot password=1 but security code is fine
                    Ext.Msg.alert('Alert','Internal Error 506, Bad Password');
                    break;
                case "01":
                    //security question needs set but forgot is ok
                    Ext.Msg.alert('Alert','Internal Error 507, Bad Password');
                    break;
                case "11":
                    //security question needs set and forgot password needs set
                    Ext.Msg.alert('Alert','Internal Error 508, Bad Password');
                    break;
                default:
                    Ext.Msg.alert('Alert','Internal Error 509, Internal Default Error');
                    break;
            }
        } catch (e){
            Ext.Msg.alert('Error','The Server returned an unknown error:510');
        }
    }
});