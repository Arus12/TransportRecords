# TransportRecords
Tento program má za úkol uložit do databáze obdržená data odpovídající zadaným pravidlům a následně je zobrazit chronologicky pod sebe na hlavní stránku. Při tvorbě byli použity technologie HTML, SCSS, CSS, CSV, MySql, PHP a JavaScript. Webová stránka běží na URL adrese: http://evidencedopravy.xf.cz


## HTML a CSS

Pomocí HTML byl vytvořen základní Layout stránek a tomu byl dán vzhled za použití technologie SCSS, která po potvrzení vytvořila soubor CSS. Ten už přímo dává vzhled HTML. Mezi vzhledy patří barvy, hlavička, hodiny, vzhled tlačítek, dotazníku a vzhled tabulky.
- ![image](https://user-images.githubusercontent.com/74651859/163685291-62b4ebb4-b4d8-4e49-a814-b0eb1fdf5326.png)
- ![image](https://user-images.githubusercontent.com/74651859/163685315-1301b7d1-3900-4deb-8244-0747449b79e8.png)
- ![HTML screen](https://user-images.githubusercontent.com/74651859/163685318-30886eb3-2be4-4db2-ac1e-75486588b344.png)
- ![SCSS](https://user-images.githubusercontent.com/74651859/163685322-6d02c4c1-eef6-48e8-9f47-e3447bd2d275.png)

## MYSql

Databáze, která slouží jako prostor pro ukládání a k pozdějšímu volání dat na hlavní stránku byla vytvořena za použití MySql. Databáze komunikuje s HTML stránkou za pomocí PHP kódu.

## PHP
PHP má za úkol obstarat samotnou komunikaci databáze se stránkou. Mezi hlavní funkce patří připojování do databáze, přidávání spojů a času do již zmíněné databáze, a reset celého systému. Jeho dalším úkolem je updatovat data do CSV souboru které pak míří do databáze.

## JavaScript
JavaScript má za úkol zobrazit všechny spoje a srovnat je pro uživatele podle časové osy. Zobrazuje celkový obsah stránky.
