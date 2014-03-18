jQuery.noConflict(); 
Ext.define('Ext.ux.form.PhoneField', { 
	alias: 'widget.phonefield', 
	extend:'Ext.form.field.Text', 
	alternateClassName: ['Ext.form.PhoneField', 'Ext.form.Phone'], 
	numberFormat:'(999) 999-9999', 
	afterRender: function(){ 
        this.callParent(); 
		var me=this, element = me.inputEl; 
		if(jQuery){ 
			jQuery(function($){ 
				$(element.dom).mask( me.numberFormat ); 
			}); 
		} 
    } 
});