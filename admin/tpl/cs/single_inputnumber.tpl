{* single_checkbox.tpl.html *}
{if isset($p) && is_array($p)}





{if $label}
<label for="input_{$p.id}" class="form-label{if isset($p.class_add_label)} {$p.class_add_label}{/if}">{$label}</label>
{/if}
<input  type="number"
 class="form-control bg-white{if isset($p.class_add)} {$p.class_add}{/if}"
 {if isset($p.id)} id="input_{$p.id}"{/if}
 {if isset($datalist) && is_array($datalist)} list="datalistOptions_{$p.id}"{/if}
 {if isset($dataset) && is_array($dataset)}
 {foreach $dataset as $key=>$item}
 data-{$key}="{$item}"
 {/foreach}
 {/if}
 value="{$p.value}"
 {if isset($p.isDisabled) && $p.isDisabled eq 1} disabled{/if}
 {if isset($p.isReadonly) && $p.isReadonly eq 1} readonly{/if}

 placeholder="Type{if isset($datalist) && is_array($datalist)} | Select{/if} ...">


{if isset($datalist) && is_array($datalist)}
<datalist id="datalistOptions_{$p.id}">
{foreach $datalist as $key=>$item}
<option value="{$item}">
{/foreach}
  <option value="San Francisco">
  <option value="New York">
  <option value="Seattle">
  <option value="Los Angeles">
  <option value="Chicago">
</datalist>
{/if}



{else}
@
{/if}

<pre class="d-none">
class_div => {if isset($p.class_div)}{$p.class_div}{else}null{/if}<br>
id => {if isset($p.id)}{$p.id}{else}null{/if}<br>
class_add => {if isset($p.class_add)}{$p.class_add}{else}null{/if}<br>
name => {if isset($p.name)}{$p.name}{else}null{/if}<br>
value => {if isset($p.value)}{$p.value}{else}null{/if}<br>
aria_label => {if isset($p.aria_label)}{$p.aria_label}{else}null{/if}<br>
isDisabled => {if isset($p.isDisabled)}{$p.isDisabled}{else}null{/if}<br>
isReadonly => {if isset($p.isReadonly)}{$p.isReadonly}{else}null{/if}<br>
isChecked => {if isset($p.isChecked)}{$p.isChecked}{else}null{/if}<br>
isIndeterminate => {if isset($p.isIndeterminate)}{$p.isIndeterminate}{else}null{/if}<br>
</pre>