<?php
<object class="Test1" name="Test1" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Page1</property>
  <property name="DocType">dtNone</property>
  <property name="Encoding">Unicode (UTF-8)            |utf-8</property>
  <property name="Height">517</property>
  <property name="IsMaster">0</property>
  <property name="Name">Test1</property>
  <property name="Width">360</property>
  <object class="Button" name="Button1" >
    <property name="Caption">Button1</property>
    <property name="Height">25</property>
    <property name="Left">50</property>
    <property name="Name">Button1</property>
    <property name="Top">384</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Edit" name="account_id1" >
    <property name="DataField">account_id</property>
    <property name="Datasource">dsentry1</property>
    <property name="Height">21</property>
    <property name="Name">account_id1</property>
    <property name="Top">239</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="balance1" >
    <property name="DataField">balance</property>
    <property name="Datasource">dsentry1</property>
    <property name="Height">21</property>
    <property name="Left">4</property>
    <property name="Name">balance1</property>
    <property name="Top">188</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="details1" >
    <property name="DataField">details</property>
    <property name="Datasource">dsentry1</property>
    <property name="Height">21</property>
    <property name="Left">4</property>
    <property name="Name">details1</property>
    <property name="Top">142</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="entry_date1" >
    <property name="DataField">entry_date</property>
    <property name="Datasource">dsentry1</property>
    <property name="Height">21</property>
    <property name="Left">4</property>
    <property name="Name">entry_date1</property>
    <property name="Top">98</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="entry_id1" >
    <property name="DataField">entry_id</property>
    <property name="Datasource">dsentry1</property>
    <property name="Height">21</property>
    <property name="Name">entry_id1</property>
    <property name="Top">295</property>
    <property name="Width">121</property>
  </object>
  <object class="Edit" name="user_id1" >
    <property name="DataField">user_id</property>
    <property name="Datasource">dsentry1</property>
    <property name="Height">21</property>
    <property name="Left">7</property>
    <property name="Name">user_id1</property>
    <property name="Top">348</property>
    <property name="Width">121</property>
  </object>
  <object class="Label" name="Label1" >
    <property name="Caption">Fecha</property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label1</property>
    <property name="Top">72</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Detalles</property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label2</property>
    <property name="Top">122</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Balance</property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label3</property>
    <property name="Top">171</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label4" >
    <property name="Caption">account_id</property>
    <property name="Height">13</property>
    <property name="Left">4</property>
    <property name="Name">Label4</property>
    <property name="Top">224</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label5" >
    <property name="Caption">user_id</property>
    <property name="Height">13</property>
    <property name="Left">13</property>
    <property name="Name">Label5</property>
    <property name="Top">328</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label6" >
    <property name="Caption">entry_id</property>
    <property name="Height">13</property>
    <property name="Left">7</property>
    <property name="Name">Label6</property>
    <property name="Top">278</property>
    <property name="Width">75</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker1" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d %I:%M:%S</property>
    <property name="Name">DateTimePicker1</property>
    <property name="Top">8</property>
    <property name="Width">359</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">57</property>
        <property name="Top">469</property>
    <property name="Connected">1</property>
    <property name="DatabaseName">amenoec1_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">amenoec1_justo</property>
    <property name="UserPassword">AM9UUJHegqS*a</property>
  </object>
  <object class="Table" name="tbentry1" >
        <property name="Left">121</property>
        <property name="Top">447</property>
    <property name="Active">1</property>
    <property name="Database">dbamenoec1_erpdonjusto1</property>
    <property name="MasterFields">a:0:{}</property>
    <property name="MasterSource"></property>
    <property name="Name">tbentry1</property>
    <property name="TableName">entry</property>
  </object>
  <object class="Datasource" name="dsentry1" >
        <property name="Left">17</property>
        <property name="Top">425</property>
    <property name="Dataset">tbentry1</property>
    <property name="Name">dsentry1</property>
  </object>
</object>
?>
