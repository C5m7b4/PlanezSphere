/*
 * File: app/controller/UserController.js
 *
 * This file was generated by Sencha Architect version 3.0.3.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 4.2.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 4.2.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('PlanezSphere.controller.UserController', {
    extend: 'Ext.app.Controller',

    models: [
        'UserModel',
        'UserLevelModel'
    ],
    stores: [
        'UsersStore',
        'UserLevelsStore'
    ],
    views: [
        'AddUserWindow'
    ],

    onCancelNewUser_click: function(button, e, eOpts) {
        Ext.getCmp('AddUserWindow').close();
    },

    onSaveNewUser_click: function(button, e, eOpts) {
        var username = Ext.ComponentQuery.query('#userUsername')[0].value;
        var firstname = Ext.ComponentQuery.query('#userFirstName')[0].value;
        var lastname = Ext.ComponentQuery.query('#userLastName')[0].value;
        var address = Ext.ComponentQuery.query('#userAddress')[0].value;
        var city = Ext.ComponentQuery.query('#userCity')[0].value;
        var state = Ext.ComponentQuery.query('#comboUserState')[0].value;
        var zip = Ext.ComponentQuery.query('#userZip')[0].value;
        var phone = Ext.ComponentQuery.query('#userPhone')[0].value;
        var email = Ext.ComponentQuery.query('#userEmail')[0].value;
        var active = Ext.ComponentQuery.query('#checkUserActive')[0].value;
        var password = Ext.ComponentQuery.query('#userPassword')[0].value;
        var confirm = Ext.ComponentQuery.query('#userConfirmPassword')[0].value;
        var userlevel = Ext.ComponentQuery.query('#userUserLevel')[0].value;

        if ( password != confirm){
            Ext.Msg.alert('Passwords','Your Passwords do not match');
            return;
        }

        Ext.Ajax.request({
            method:'POST',
            url:'_data/create_User.php',
            params:{
                'username':username,
                'firstname':firstname,
                'lastname':lastname,
                'address':address,
                'city':city,
                'state':state,
                'zip':zip,
                'phone':phone,
                'email':email,
                'active':active,
                'password':password,
                'userlevel':userlevel
            },
            success:function(response){
                var parser = Ext.create('PlanezSphere.parse.c5Parse',{});
                if ( parser.parseAjax(response) === true){
                    Ext.getCmp('AddUserWindow').close();
                }
            }
        });

    },

    init: function(application) {
        this.control({
            "#btnCancelAddUser": {
                click: this.onCancelNewUser_click
            },
            "#btnSaveNewUser": {
                click: this.onSaveNewUser_click
            }
        });
    }

});
