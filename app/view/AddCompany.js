/*
 * File: app/view/AddCompany.js
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

Ext.define('PlanezSphere.view.AddCompany', {
    extend: 'Ext.window.Window',

    requires: [
        'Ext.container.Container',
        'Ext.form.Label',
        'Ext.form.field.ComboBox',
        'Ext.form.field.Checkbox',
        'Ext.button.Button'
    ],

    height: 336,
    width: 565,
    autoScroll: true,
    bodyPadding: 15,
    title: 'Add Company',

    layout: {
        type: 'vbox',
        align: 'stretch'
    },

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'container',
                    flex: 1,
                    maxHeight: 30,
                    items: [
                        {
                            xtype: 'label',
                            maxHeight: 27,
                            text: 'ID:'
                        },
                        {
                            xtype: 'label',
                            itemId: 'lblCompanyId',
                            maxHeight: 27
                        }
                    ]
                },
                {
                    xtype: 'textfield',
                    flex: 1,
                    itemId: 'txtCompanyName',
                    maxHeight: 27,
                    fieldLabel: 'Company Name',
                    labelAlign: 'right',
                    labelWidth: 125
                },
                {
                    xtype: 'textfield',
                    flex: 1,
                    itemId: 'txtCompanyAddress',
                    maxHeight: 27,
                    fieldLabel: 'Address',
                    labelAlign: 'right',
                    labelWidth: 125
                },
                {
                    xtype: 'container',
                    flex: 1,
                    maxHeight: 30,
                    layout: {
                        type: 'hbox',
                        align: 'stretch'
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            flex: 1,
                            itemId: 'txtCompanyCity',
                            maxHeight: 27,
                            maxWidth: 350,
                            fieldLabel: 'City',
                            labelAlign: 'right',
                            labelWidth: 125
                        },
                        {
                            xtype: 'combobox',
                            flex: 1,
                            itemId: 'comboCompanyState',
                            maxHeight: 27,
                            maxWidth: 150,
                            fieldLabel: 'State',
                            labelAlign: 'right',
                            labelWidth: 75
                        }
                    ]
                },
                {
                    xtype: 'container',
                    flex: 1,
                    margins: '5 0 0 0',
                    maxHeight: 35,
                    layout: {
                        type: 'hbox',
                        align: 'stretch'
                    },
                    items: [
                        {
                            xtype: 'textfield',
                            flex: 1,
                            itemId: 'txtCompanyZip',
                            maxHeight: 27,
                            maxWidth: 225,
                            fieldLabel: 'Zip',
                            labelAlign: 'right',
                            labelWidth: 125
                        },
                        {
                            xtype: 'combobox',
                            flex: 1,
                            itemId: 'comboStoreContact',
                            maxHeight: 27,
                            fieldLabel: 'Contact',
                            labelAlign: 'right'
                        }
                    ]
                },
                {
                    xtype: 'textfield',
                    flex: 1,
                    itemId: 'txtCompanyPhone',
                    maxHeight: 27,
                    maxWidth: 300,
                    fieldLabel: 'Phone',
                    labelAlign: 'right',
                    labelWidth: 125,
                    inputType: 'tel'
                },
                {
                    xtype: 'checkboxfield',
                    flex: 1,
                    itemId: 'checkCompanyActive',
                    maxHeight: 27,
                    fieldLabel: 'Active',
                    labelAlign: 'right',
                    labelWidth: 125
                },
                {
                    xtype: 'container',
                    flex: 1,
                    maxHeight: 35,
                    layout: {
                        type: 'hbox',
                        align: 'stretch',
                        pack: 'end'
                    },
                    items: [
                        {
                            xtype: 'button',
                            flex: 1,
                            margins: '0 10 0 10',
                            itemId: 'btnCancelAddCompany',
                            maxHeight: 27,
                            maxWidth: 100,
                            text: 'Cancel'
                        },
                        {
                            xtype: 'button',
                            flex: 1,
                            margins: '0 10 0 10',
                            itemId: 'btnSubmitCompany',
                            maxHeight: 27,
                            maxWidth: 100,
                            text: 'Submit'
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    }

});