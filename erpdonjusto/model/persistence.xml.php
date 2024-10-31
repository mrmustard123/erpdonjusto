<?php
<object class="persistence" name="persistence" baseclass="DataModule">
  <property name="Height">484</property>
  <property name="Name">persistence</property>
  <property name="Width">781</property>
  <property name="OnShow">persistenceShow</property>
  <object class="Database" name="dbapicolad_erpdonjusto1" >
        <property name="Left">266</property>
        <property name="Top">116</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbapicolad_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="tbpos_history1" >
        <property name="Left">136</property>
        <property name="Top">174</property>
    <property name="Active">1</property>
    <property name="Database">dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbpos_history1</property>
    <property name="TableName">pos_history</property>
  </object>
  <object class="Datasource" name="dspos_history1" >
        <property name="Left">136</property>
        <property name="Top">256</property>
    <property name="Dataset">tbpos_history1</property>
    <property name="Name">dspos_history1</property>
  </object>
</object>
?>
