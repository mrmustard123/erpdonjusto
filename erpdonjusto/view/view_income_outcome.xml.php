<?php
<object class="view_income_outcome" name="view_income_outcome" baseclass="Page">
  <property name="Background"></property>
  <property name="Caption">Gastos vs. Ahorros</property>
  <property name="DocType">dtNone</property>
  <property name="Height">494</property>
  <property name="IsMaster">0</property>
  <property name="Name">view_income_outcome</property>
  <property name="Width">674</property>
  <property name="OnBeforeShowHeader">view_income_outcomeBeforeShowHeader</property>
  <property name="OnShow">view_income_outcomeShow</property>
  <object class="Label" name="Label1" >
    <property name="Caption">Gastos vs. Ahorros</property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label1</property>
    <property name="Top">208</property>
    <property name="Visible">0</property>
    <property name="Width">475</property>
    <property name="OnAfterShow">Label1AfterShow</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker1" >
    <property name="Caption">DateTimePicker1</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">16</property>
    <property name="Name">DateTimePicker1</property>
    <property name="Top">56</property>
    <property name="Width">200</property>
  </object>
  <object class="DateTimePicker" name="DateTimePicker2" >
    <property name="Caption">DateTimePicker2</property>
    <property name="Height">17</property>
    <property name="IfFormat">%Y-%m-%d</property>
    <property name="Left">16</property>
    <property name="Name">DateTimePicker2</property>
    <property name="Top">104</property>
    <property name="Width">200</property>
  </object>
  <object class="Label" name="Label2" >
    <property name="Caption">Fecha Inicio:</property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label2</property>
    <property name="Top">40</property>
    <property name="Width">75</property>
  </object>
  <object class="Label" name="Label3" >
    <property name="Caption">Fecha fin:</property>
    <property name="Height">13</property>
    <property name="Left">16</property>
    <property name="Name">Label3</property>
    <property name="Top">88</property>
    <property name="Width">75</property>
  </object>
  <object class="Button" name="Button1" >
    <property name="Caption">Ok</property>
    <property name="Height">25</property>
    <property name="Left">16</property>
    <property name="Name">Button1</property>
    <property name="Top">144</property>
    <property name="Width">75</property>
    <property name="OnClick">Button1Click</property>
  </object>
  <object class="Database" name="dbamenoec1_erpdonjusto1" >
        <property name="Left">577</property>
        <property name="Top">12</property>
    <property name="DatabaseName">apicolad_erpdonjusto</property>
    <property name="Host">localhost</property>
    <property name="Name">dbamenoec1_erpdonjusto1</property>
    <property name="UserName">apicolad_justo</property>
    <property name="UserPassword">aA1NfDBW5Wlm</property>
  </object>
  <object class="Query" name="Query1" >
        <property name="Left">576</property>
        <property name="Top">89</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query2" >
        <property name="Left">568</property>
        <property name="Top">152</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query3" >
        <property name="Left">568</property>
        <property name="Top">232</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query3</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query4" >
        <property name="Left">568</property>
        <property name="Top">280</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query4</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query5" >
        <property name="Left">568</property>
        <property name="Top">336</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query5</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query6" >
        <property name="Left">568</property>
        <property name="Top">384</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query6</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query7" >
        <property name="Left">552</property>
        <property name="Top">440</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query7</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query8" >
        <property name="Left">480</property>
        <property name="Top">432</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query8</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query9" >
        <property name="Left">400</property>
        <property name="Top">432</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query9</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query10" >
        <property name="Left">296</property>
        <property name="Top">440</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query10</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query11" >
        <property name="Left">192</property>
        <property name="Top">440</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query11</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query12" >
        <property name="Left">112</property>
        <property name="Top">440</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query12</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query13" >
        <property name="Left">32</property>
        <property name="Top">432</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query13</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query14" >
        <property name="Left">32</property>
        <property name="Top">368</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query14</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query15" >
        <property name="Left">104</property>
        <property name="Top">376</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query15</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="Query" name="Query16" >
        <property name="Left">192</property>
        <property name="Top">376</property>
    <property name="Database">database_module01.dbapicolad_erpdonjusto1</property>
    <property name="LimitCount">-1</property>
    <property name="LimitStart">-1</property>
    <property name="Name">Query16</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
