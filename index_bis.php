<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form>
                <table cellspacing="10px"><tbody><tr>
<td><div style="width:400px; height:400px; border: 2px solid #000000; padding: 3px; -moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px;">
            <div id="reglagesGeneraux">
                <label for="nom-site">Nom du site :</label><input type="text" id="nom-site" name="nom-site" placeholder="Nom du site" /><br />
                <label for="adresse-site">Adresse du site :</label><input type="text" id="adresse-site" name="adresse-site" placeholder="Adresse du site" /><br />
                <label for="operateur">Op&eacute;rateur :</label>
                    <input type="text" id="operateur" list="liste-operateur" placeholder="Op&eacute;rateur"/>
                    <datalist id="liste-operateur">
                        <option>Monsieur Stark</option>
                        <option>Madame Potts</option>
                    </datalist>
                    <br />
                <label for="prescripteur">Prescripteur :</label>
                    <input type="text" id="prescripteur" list="liste-prescripteur" placeholder="Prescripteur"/>
                    <datalist id="liste-prescripteur">
                        <option>Monsieur Wayne</option>
                        <option>Madame Kyle</option>
                    </datalist>
                    <br />
                <label for="realisateur">R&eacute;alisateur :</label>
                    <input type="text" id="realisateur" list="liste-realisateur" placeholder="R&eacute;alisateur"/>
                    <datalist id="liste-realisateur">
                        <option>Monsieur Rogers</option>
                        <option>Madame Carter</option>
                    </datalist>
                    <br />
                <label for="position-examen">Position de l'examen :</label>
                    <input type="text" id="position-examen" list="liste-positions-examen" placeholder="Position"/>
                    <datalist id="liste-positions-examen">
                        <option>Debout</option>
                        <option>Allong&eacute;</option>
                    </datalist>
                    <br />
                <label for="activite-examen">&Eacute;tat du muscle / activit&eacute; demand&eacute;e :</label>
                    <input type="text" id="activite-examen" list="liste-activites-examen" placeholder="Activit&eacute;"/>
                    <datalist id="liste-activites-examen">
                        <option>Repos</option>
                        <option>Contraction</option>
                        <option>Extension</option>
                    </datalist>
                    <br />
                <label for="localisation-examen">Localisation de l'examen :</label>
                    <input type="text" id="localisation-examen" list="liste-localisations-examen" placeholder="Localisation"/>
                    <datalist id="liste-localisations-examen">
                        <option>Bras</option>
                        <option>Mollet</option>
                        <option>Ventre</option>
                    </datalist>
                    <br />
                <input type="button" value="suivant"/>
            </div>
                </div></td>
                <td><div style="width:400px; height:400px;">
            <div id="reglagesDicom">
                <label for="adresse-ip">Adresse IP :</label><input type="text" id="adresse-ip" name="adresse-ip" placeholder="Adresse IP" /><br />
                <label for="port-dicom">Port DICOM :</label><input type="text" id="port-dicom" name="port-dicom" placeholder="Port DICOM" /><br />
                <label for="syntaxe-transfert">Syntaxe de tranfert :</label>
                    <input type="text" id="syntaxe-transfert" list="liste-syntaxe" placeholder="Syntaxes"/>
                    <datalist id="liste-syntaxe">
                        <option>Implicit little endian</option>
                        <option>Explicit little endian</option>
                        <option>Implicit big endian</option>
                        <option>Explicit big endian</option>
                    </datalist>
                    <br />
                <input type="button" value="suivant"/>
            </div>
                </div></td></tr>
                <tr><td><div style="width:400px; height:400px;">
            <div id="Logs">
                <textarea rows="4" cols="50">
                    Ceci est un test pour les logs.
                </textarea>
                <br />
                <input type="button" value="suivant"/>
            </div>
                </div></td>
                <td><div style="width:400px; height:400px;">
            <div id="sauvegarder">
                <input type="button" value="charger configuration"/>
                <input type="button" value="sauvegarder"/>
            </div>
                </div></td></tr></tbody></table>
        </form>
    </body>
</html>
