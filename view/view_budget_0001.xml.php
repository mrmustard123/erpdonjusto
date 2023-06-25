<?php
<object class="view_budget0001" name="view_budget0001" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">PRESUPUESTO 0001</property>
  <property name="DocType">dtNone</property>
  <property name="Height">559</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_budget0001</property>
  <property name="Width">747</property>
  <property name="OnShow">view_budget0001Show</property>
  <property name="OnShowHeader">view_budget0001ShowHeader</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Label1</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label1</property>
    <property name="Top">40</property>
    <property name="Width">75</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker1" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">40</property>
    <property name="Name">DateTimePicker1</property>
    <property name="Top">56</property>
    <property name="Width">200</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker2" >
    <property name="Caption">DateTimePicker2</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">40</property>
    <property name="Name">DateTimePicker2</property>
    <property name="Top">120</property>
    <property name="Width">200</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Label2</property>
    <property name="Height">13</property>
    <property name="Left">40</property>
    <property name="Name">Label2</property>
    <property name="Top">104</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Label3</property>
    <property name="Height">13</property>
    <property name="Left">8</property>
    <property name="Name">Label3</property>
    <property name="Top">224</property>
    <property name="Visible">0</property>
    <property name="Width">683</property>
    <property name="OnAfterShow">Label3AfterShow</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Aceptar</property>
    <property name="Height">25</property>
    <property name="Left">112</property>
    <property name="Name">Button1</property>
    <property name="Top">160</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">608</property>
        <property name="Top">48</property>
    <property name="Active">1</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL"><![CDATA[a:1:{i:0;s:107:&quot;SELECT SUM(balance) FROM entry WHERE account_id = 280 AND entry_date BETWEEN '2018-10-01' AND '2018-12-20' &quot;;}]]></property>
  </object>
  <object class="Query" name="Query2" >
        <property name="Left">608</property>
        <property name="Top">128</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="Name">Query2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">466</property>
        <property name="Top">29</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
</object>
?>
