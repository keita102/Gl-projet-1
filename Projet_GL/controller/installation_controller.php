<?php 

//controller of installation
//Page de traitement du formulaire d'inscription on verifie les differents champs

$error="";
extract($_POST);

 if(isset($_POST['bouton'])):


            if(isset($nom) and isset($prenom) and isset($sexe) and isset($mdp) and isset($mail)):


                   $nom=str_secure($nom);
                   $prenom=str_secure($prenom);
                   $sexe=str_secure($sexe);
                   $mdp=str_secure($mdp);
                   $mail=str_secure($mail);

                   if(empty($nom)):


                            $error="Veuillez Renseigné votre nom";


                   else:

                            if(strlen($nom)>=255):


                                    $error=" Votre nom ne doit  pas etre si grand";


                            else:


                                   if(empty($prenom)):



                                   else:

                                       if(strlen($prenom)>=255):




                                                   $error=" Votre Prenom ne doit  pas etre si grand";
                                       else:


                                                 if(empty($mdp)):





                                                 else:

                                                     if($mdp<7):


                                                         $error=" votre mot de passe doit contenir moin de 7 carateres";



                                                     else:

                                                           if(empty($mail)):



                                                           else:



                                                                    if(filter_var($mail,FILTER_VALIDATE_EMAIL)):



                                                                            


                                                                        else:

                                                                            $eror="Le mail n'est pas valide";


                                                                        endif;



                                                          endif;

                                                    endif;


                                                endif;


                                       endif;



                                   endif;




                            endif;


                   endif;


                            

            else:

                    


            endif;


        installation($nom,$mdp);

 endif;




