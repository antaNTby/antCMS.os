{* single_checkbox.tpl.html *}
{if isset($p) && is_array($p)}
{if $label}
  {if $toggle}
<div class="form-check form-switch{if isset($p.class_div)} {$p.class_div}{/if}">
  {else}
<div class="form-check{if isset($p.class_div)} {$p.class_div}{/if}">
  {/if}
{else}
<div{if isset($p.class_div)} class="{$p.class_div}"{/if}>
{/if}
  <input type="checkbox"{if $toggle} role="switch"{/if}
  class="form-check-input{if isset($p.class_add)} {$p.class_add}{/if}{if isset($p.isIndeterminate) && $p.isIndeterminate eq 1} indeterminate{/if}"
  {if isset($p.id)} id="checkbox_{$p.id}"{/if}
  {if isset($p.name)} name="checkbox_{$p.name}"{/if}
  {if isset($p.value)} value="{$p.value}"{/if}

{if isset($dataset) && is_array($dataset)}
{foreach $dataset as $key=>$item}
data-{$key}="{$item}"
{/foreach}
{/if}

  {if isset($p.value)} value="{$p.value}"{/if}
  aria-label="{$p.name}"
  {if isset($p.isDisabled) && $p.isDisabled eq 1} disabled{/if}
  {if isset($p.isChecked) && $p.isChecked eq 1} checked{/if}>
{if $label}<label class="form-check-label text-nowrap{if isset($p.class_add_label)} {$p.class_add_label}{/if}" for="checkbox_{$p.id}">&nbsp;{$label}</label> {/if}
</div>
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