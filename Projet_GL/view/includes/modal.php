<!-- Modal -->
    <?php 
             //utilisation de certaints traits
            use Spipu\Html2Pdf\Html2Pdf;
            use Spipu\Html2Pdf\Exception\Html2PdfException;
            use Spipu\Html2Pdf\Exception\ExceptionFormatter;

              extract($_POST);

              if(isset($out)):
                  
                  sleep(1);
                  header("location:deconnection");
                  exit();

              endif;

              if(isset($enregistrer)):
    
             //verification de l'existance de certains elements du formulaire de soumission d'article
                  if(isset($identificateur)  and isset($nom) and isset($titre)  and  isset($resume)):

                          //declaration de la date 
                        $date=date("j/M/Y g:i:s");
                      //le contenu du pdf
                        $content="  
                                            <br>
                                            <br>
                                             <b>Paru  le : </b> $date <br>
                                             <h4>Article Numero: $identificateur </h4> <br>
                                             <h4>Auteur :   $nom </h4>   <br>
                                             <h4> Titre :  $titre </h4>  <br>
                                            
                                              <h4>Resume </h4>
                                              <h4>$resume</h4>            
                                  ";

                        //on cree un fichier avec le nom de l'auteur
                        $article=new Article($identificateur,$titre,$nom,$resume);
                        $article->createResume();



                            
                         sleep(1);

                        try{    

                                 //utilisation de la classe permettant de generer des pdf

                                $html2pdf = new Html2Pdf("P","A4","fr");
                                //le pdf contient le contenu content
                                $html2pdf->writeHTML($content);
                                //on rempli le fichier qui a le nom de l'auteur
                                $html2pdf->output("C:wamp".DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."gl-projet".DIRECTORY_SEPARATOR."Projet_GL".DIRECTORY_SEPARATOR."Articles".DIRECTORY_SEPARATOR.$nom.".pdf","F");

                        }catch(Html2PdfException $e){

                                $html2pdf = new Html2Pdf("P","A4","fr");
                                $html2pdf->writeHTML($content);
                                $html2pdf->output("C:wamp".DIRECTORY_SEPARATOR."www".DIRECTORY_SEPARATOR."gl-projet".DIRECTORY_SEPARATOR."Projet_GL".DIRECTORY_SEPARATOR."Articles".DIRECTORY_SEPARATOR.$nom.".pdf","F");
                        }


                  endif;

              endif;


              ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                   <b> Souhaitez vous  vraiment vous deconnecté ? </b>
                   <br>

                   Nb: Toutes vos sessions disparaitrons
          </div>
          <div class="modal-footer">
            <form method="post" action="">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <button  class="btn btn-primary" name="out">Oui</button>
            </form>
               


          </div>
        </div>
      </div>
    </div>


   


   <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Resume d'Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


    

          <form   method="post"   action=""  class="form-group col-md-12">
                      
                      <label>Identificateur</label>

                      <input type="text" name="identificateur"  class="form-control border-success">

                          <label>Nom & Prenom </label>

                          <input type="text" name="nom" class="form-control  border-success" >

                          <label>Titre</label>

                          <input type="text" name="titre"  class="form-control border-success">

                          <label>Resume</label>

                          <textarea rows="5" id="resume" name="resume"   class="form-control border-success"  >

                          </textarea>

      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-primary col-md-6 " name="enregistrer">
            soumettre un article
        </button>


      </div>
    </form>
    </div>
  </div>








