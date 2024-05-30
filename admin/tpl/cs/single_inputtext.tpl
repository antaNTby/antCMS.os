{* single_checkbox.tpl.html *}
{if isset($p) && is_array($p)}





{if $label}
<label for="input_{$p.id}" class="form-label{if isset($p.class_add_label)} {$p.class_add_label}{/if}">{$label}</label>
{/if}
<input  type="text"
 class="form-control bg-white{if isset($p.class_add)} {$p.class_add}{/if}"
 {if isset($p.id)} id="input_{$p.id}"{/if}
 {if isset($datalist) && is_array($datalist)} list="datalistOptions_{$p.id}"{/if}
 {if isset($dataset) && is_array($dataset)}
 {foreach $dataset as $key=>$item}
 data-{$key}="{$item}"
 {/foreach}
 {/if}
 value="{$p.value}"
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
{$p.class_div}
{$p.id}
{$p.class_add}
{$p.name}
{$p.value}
{$p.aria_label}
{$p.isDisabled}
{$p.isChecked}
{$p.isIndeterminate}
</pre>