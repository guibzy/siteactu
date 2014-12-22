<h2> {$data['Titre_Article']}</h2></br>

<p>{$data['Contenu_Article']}</p>
{if $data['Note_Redacteur'] eq null}{else} <b>Note du produit :</b> {$data['Note_Redacteur']} {/if}
</br><p>Ecrit le <b>{$data['Date_Article']}</b> par <b>{$user->login}</b></p>