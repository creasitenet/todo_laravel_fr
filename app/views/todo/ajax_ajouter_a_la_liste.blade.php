                    <tr id="todo_{{ $t->id }}">

                        <td>
                        <div class="date">
                        {{ $t->date_jour_mois() }}<br />
                        <small><span>{{ $t->date_heure_minute() }}</span></small>
                        </div>
                        </td>
                        
                        <td><p class="texte">{{ $t->texte }}</p></td>
                        
                        <td>  
                            <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" id="statut_{{ $t->id }}" onchange="mise_a_jour_statut('todoAjaxMajStatut', '{{ $t->id }}', '#statut_{{ $t->id }}')" @if ($t->statut==1) {{ 'checked' }} @endif />
                                <label class="onoffswitch-label" for="statut_{{ $t->id }}"> 
                                        <span class="onoffswitch-inner" data-swchon-text="OUI" data-swchoff-text="NON"></span> 
                                        <span class="onoffswitch-switch"></span>
                                </label> 
                            </div>
                            </div>
                        </td>

                        <td>
                            <div class="boutons">
                            <a class="cliquable" data-toggle="modal" data-reveal-id="modal_supprimer" data-target="#modal_supprimer_{{ $t->id }}">
                                <i class="fa fa-trash-o fa-2x rouge"></i>
                            </a>
                            </div>
                                <!-- Modal pour la suppression -->
                                <div class="modal fade" id="modal_supprimer_{{ $t->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body"> 
                                        <h4 class="modal-title text-danger" id="myModalLabel">Etes vous vraiment sûr de vouloir supprimer la tâche ?</h4>
                                        <p>Cette opération est irréverssible</p>
                                        <button type="button" class="btn btn-danger" onclick="supprimer_element('todoAjaxSupprimer','{{ $t->id }}','#todo_{{ $t->id }}')">
                                        SUPPRIMER
                                        </button>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">ANNULER</button>
                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                        </td>
                    </tr>
