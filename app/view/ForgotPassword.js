/*
 * File: app/view/ForgotPassword.js
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

Ext.define('PlanezSphere.view.ForgotPassword', {
    extend: 'Ext.window.Window',
    alias: 'widget.forgotPassword',

    requires: [
        'Ext.form.FieldSet',
        'Ext.form.field.Text',
        'Ext.button.Button'
    ],

    frame: true,
    height: 169,
    id: 'forgotPassword',
    width: 309,
    title: 'Set Password',

    layout: {
        type: 'vbox',
        align: 'stretch'
    },

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'fieldset',
                    flex: 1,
                    border: 0,
                    margin: 5,
                    padding: 10,
                    items: [
                        {
                            xtype: 'textfield',
                            itemId: 'changePassword',
                            fieldLabel: 'Password',
                            labelAlign: 'right',
                            inputType: 'password'
                        },
                        {
                            xtype: 'textfield',
                            itemId: 'confirmPassword',
                            fieldLabel: 'Confirm',
                            labelAlign: 'right',
                            inputType: 'password'
                        },
                        {
                            xtype: 'container',
                            minHeight: 10
                        },
                        {
                            xtype: 'container',
                            margin: 5,
                            layout: {
                                type: 'hbox',
                                align: 'stretch',
                                pack: 'center'
                            },
                            items: [
                                {
                                    xtype: 'button',
                                    flex: 1,
                                    margins: '0 5 0 5',
                                    itemId: 'btnCancelChangePassword',
                                    text: 'Cancel'
                                },
                                {
                                    xtype: 'button',
                                    flex: 1,
                                    margins: '0 5 0 5',
                                    itemId: 'btnSubmitChangePassword',
                                    text: 'Submit'
                                }
                            ]
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    }

});