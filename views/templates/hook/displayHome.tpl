<div class="tpl">
    {if isset($categories) && count($categories) > 0}
        <div class="best-categories">
            {foreach from=$categories item=category}
                <div class="category">
                    <a href="{$category.link}" title="{$category.name}">
                        <img src="{$category.image}" alt="{$category.name}" />
                        <span>{$category.name}</span>
                    </a>
                </div>
            {/foreach}
        </div>
    {else}
        <p>{l s='No categories to display'}</p>
    {/if}
</div>