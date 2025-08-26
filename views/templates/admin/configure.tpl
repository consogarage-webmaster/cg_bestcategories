{ 
  "title": "Configuration des catégories à afficher", 
  "form": { 
    "header": { 
      "title": "Sélectionnez les catégories à afficher sur la page d'accueil" 
    }, 
    "fields": { 
      "categories": { 
        "label": "Catégories", 
        "type": "checkbox", 
        "options": { 
          "query": "{foreach from=$categories item=category} 
                      <option value=\"{$category.id_category}\">{$category.name}</option> 
                    {/foreach}", 
          "id": "id_category", 
          "name": "name" 
        } 
      } 
    }, 
    "submit": { 
      "title": "Enregistrer", 
      "class": "btn btn-default pull-right" 
    } 
  } 
}