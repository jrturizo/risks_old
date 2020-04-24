<fieldset>							
										<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;"><h3>Información del Vehículo y/o Equipo.</h3></strong></span>
														</div>
														<hr>
													</div>
												</center>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Placa: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="placa" name="placa" size="32" placeholder="Placa" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Marca: </label>
													<input type="text" class="form-control text-bold text-size-large" id="brand" name="brand" size="32" placeholder="Marca" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Tipo: </label>
													<input type="text" class="form-control text-bold text-size-large" id="type" name="type" size="32" placeholder="Tipo" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Clase: </label>
													<input type="text" class="form-control text-bold text-size-large" id="class" name="class" size="32" placeholder="Clase" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset disabled>							
										<div class="row"> 
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Modelo: </label>
													<input type="text" class="form-control text-bold text-size-large" id="model" name="model" size="32" placeholder="Modelo" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Chasis: </label>
													<input type="text" class="form-control text-bold text-size-large" id="chassis" name="chassis" size="32" placeholder="Chasis" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Motor: </label>
													<input type="text" class="form-control text-bold text-size-large" id="engine" name="engine" size="32" placeholder="Motor" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Codigo interno: </label>
													<input type="text" class="form-control text-bold text-size-large" id="codInterno" name="codInterno" size="32" placeholder="Codigo interno" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Cédula: </label>
													<input type="text" class="form-control text-bold text-size-large" id="identCard" name="identCard" size="32" placeholder="Cédula" maxlength="15" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Operario/Conductor: </label>
													<input type="text" class="form-control text-bold text-size-large" id="operatorDriver" name="operatorDriver" size="32" placeholder="Operario/Conductor" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Teléfono/Conductor: </label>
													<input type="text" class="form-control text-bold text-size-large" id="phoneDriver" name="phoneDriver" size="32" placeholder="Teléfono/Conductor" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>	
										<div class="row">                            	
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Presencia Tránsito: </label>
													<div class="btn-group" id="status" data-toggle="buttons">
														<label class="btn btn-default btn-on btn-lg active classSubContra" title="N" >
															<input type="radio" value="N" name="transitPolice" id="transitPoliceY">NO
														</label>
														<label class="btn btn-default btn-off btn-lg classSubContra" title="Y">
															<input type="radio" value="Y" name="transitPolice" id="transitPoliceN" checked="checked">SI
														</label>
													</div>
												</div>                                        									
											</div>                                       	
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Inmovilización: </label>
													<div class="btn-group" id="status" data-toggle="buttons">
														<label class="btn btn-default btn-on btn-lg active classSubContra" title="N" >
															<input type="radio" value="N" name="immobilization" id="immobilizationY">NO
														</label>
														<label class="btn btn-default btn-off btn-lg classSubContra" title="Y">
															<input type="radio" value="Y" name="immobilization" id="immobilizationN" checked="checked">SI
														</label>
													</div>
												</div>                                        									
											</div>                            	                               
										</div>						
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Taller de reparación: </label>
													<select class="select" id="workRepair" name="workRepair">											
														<option>SELECCIONE UNA OPCIÓN</option>						
													</select>
												</div> 
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Resp-taller: </label>
													<select class="select" id="respWorkshop" name="respWorkshop">											
														<option>SELECCIONE UNA OPCIÓN</option>						
													</select>
												</div> 
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Tel-taller: </label>
													<input type="text" class="form-control text-bold text-size-large" id="telWorkshop" name="telWorkshop" size="32" placeholder="Tel-taller" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="text-semibold">Fecha ingreso al taller: </label>
													<input type="text" class="form-control fecha-simple" placeholder="DD/MM/AAAA"  id="dateEntry" name="dateEntry" size="32"  maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>