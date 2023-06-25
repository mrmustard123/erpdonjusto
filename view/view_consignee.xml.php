<?php
<object class="view_consignee" name="view_consignee" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption"><![CDATA[CONSIGNAT&Aacute;RIO]]></property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">559</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_consignee</property>
  <property name="Width">360</property>
  <property name="OnBeforeShow">view_consigneeBeforeShow</property>
  <property name="OnBeforeShowHeader">view_consigneeBeforeShowHeader</property>
  <property name="OnShow">view_consigneeShow</property>
  <object class="Edit" name="account_id1" >
    <property name="DataField">account_id</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">account_id1</property>
    <property name="TabOrder">5</property>
    <property name="Tag">5</property>
    <property name="Top">307</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="consig_addr1" >
    <property name="DataField">consig_addr</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">consig_addr1</property>
    <property name="TabOrder">3</property>
    <property name="Tag">3</property>
    <property name="Top">208</property>
    <property name="Width">359</property>
  </object>
  <object class="Edit" name="consig_coord1" >
    <property name="DataField">consig_coord</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">consig_coord1</property>
    <property name="TabOrder">4</property>
    <property name="Tag">4</property>
    <property name="Top">253</property>
    <property name="Width">219</property>
  </object>
  <object class="Edit" name="consig_details1" >
    <property name="DataField">consig_details</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">consig_details1</property>
    <property name="TabOrder">1</property>
    <property name="Tag">1</property>
    <property name="Top">95</property>
    <property name="Width">359</property>
  </object>
  <object class="Edit" name="consig_name1" >
    <property name="DataField">consig_name</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">consig_name1</property>
    <property name="Top">46</property>
    <property name="Width">359</property>
  </object>
  <object class="Edit" name="consig_tel1" >
    <property name="DataField">consig_tel</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">consig_tel1</property>
    <property name="TabOrder">2</property>
    <property name="Tag">2</property>
    <property name="Top">154</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Nombre:</property>
    <property name="Height">13</property>
    <property name="Left">5</property>
    <property name="Name">Label1</property>
    <property name="Top">31</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Detalles:</property>
    <property name="Height">13</property>
    <property name="Name">Label2</property>
    <property name="Top">80</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption"><![CDATA[Tel&eacute;fono:]]></property>
    <property name="Height">13</property>
    <property name="Name">Label3</property>
    <property name="Top">137</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption"><![CDATA[Direcci&oacute;n:]]></property>
    <property name="Height">13</property>
    <property name="Name">Label4</property>
    <property name="Top">190</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">Coordenadas</property>
    <property name="Height">13</property>
    <property name="Name">Label5</property>
    <property name="Top">237</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">account_id</property>
    <property name="Height">13</property>
    <property name="Name">Label6</property>
    <property name="Top">288</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Ok</property>
    <property name="Height">25</property>
    <property name="Left">136</property>
    <property name="Name">Button1</property>
    <property name="TabOrder">7</property>
    <property name="Tag">6</property>
    <property name="Top">400</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Edit" name="ctas_por_cobrar_id1" >
    <property name="DataField">ctas_por_cobrar_id</property>
    <property name="Datasource">dsconsignee1</property>
    <property name="Height">21</property>
    <property name="Name">ctas_por_cobrar_id1</property>
    <property name="TabOrder">6</property>
    <property name="Top">356</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label7" >
    <property name="Caption">Ctas. x Cobrar ID:</property>
    <property name="Height">13</property>
    <property name="Left">3</property>
    <property name="Name">Label7</property>
    <property name="Top">340</property>
    <property name="Width">118</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">238</property>
        <property name="Top">453</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Table" name="consignee_list" >
        <property name="Left">70</property>
        <property name="Top">407</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">consignee_list</property>
    <property name="TableName">consignee</property>
  </object>
  <object class="Datasource" name="dsconsignee1" >
        <property name="Left">70</property>
        <property name="Top">473</property>
    <property name="Dataset">consignee_list</property>
    <property name="Name">dsconsignee1</property>
  </object>
</object>
?>
