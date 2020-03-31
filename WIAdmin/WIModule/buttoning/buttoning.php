<?php

/**
* 
*/
class buttoning 
{
    //test2
    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

    public function editMod()
    {
              echo `<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div><div class="container-fluid">
	<div class="row-fluid">
		<div class="col-xs-3">
			 <address> <strong>Twitter, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890</address>
		</div>
		<div class="col-xs-9">
			<ol>
				<li>
					Lorem ipsum dolor sit amet
				</li>
				<li>
					Consectetur adipiscing elit
				</li>
				<li>
					Integer molestie lorem at massa
				</li>
				<li>
					Facilisis in pretium nisl aliquet
				</li>
				<li>
					Nulla volutpat aliquam velit
				</li>
				<li>
					Faucibus porta lacus fringilla vel
				</li>
				<li>
					Aenean sit amet erat nunc
				</li>
				<li>
					Eget porttitor lorem
				</li>
			</ol>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
			<h3>
				h3. Lorem ipsum dolor sit amet.
			</h3>
		</div>
		<div class="col-xs-4">
			<div class="bs-example">
				<div class="color-swatches">
					<div class="color-swatch brand-primary">
					</div>
					<div class="color-swatch brand-success">
					</div>
					<div class="color-swatch brand-info">
					</div>
					<div class="color-swatch brand-warning">
					</div>
					<div class="color-swatch brand-danger">
					</div>
				</div><br />
				<div class="color-swatches">
					<div class="color-swatch gray-darker">
					</div>
					<div class="color-swatch gray-dark">
					</div>
					<div class="color-swatch gray">
					</div>
					<div class="color-swatch gray-light">
					</div>
					<div class="color-swatch gray-lighter">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<h1 class="page-header">
							Dashboard
						</h1>
						<div class="row placeholders">
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
						</div>
						<h2 class="sub-header">
							Section title
						</h2>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											Header
										</th>
										<th>
											Header
										</th>
										<th>
											Header
										</th>
										<th>
											Header
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1,001
										</td>
										<td>
											Lorem
										</td>
										<td>
											ipsum
										</td>
										<td>
											dolor
										</td>
										<td>
											sit
										</td>
									</tr>
									<tr>
										<td>
											1,002
										</td>
										<td>
											amet
										</td>
										<td>
											consectetur
										</td>
										<td>
											adipiscing
										</td>
										<td>
											elit
										</td>
									</tr>
									<tr>
										<td>
											1,003
										</td>
										<td>
											Integer
										</td>
										<td>
											nec
										</td>
										<td>
											odio
										</td>
										<td>
											Praesent
										</td>
									</tr>
									<tr>
										<td>
											1,003
										</td>
										<td>
											libero
										</td>
										<td>
											Sed
										</td>
										<td>
											cursus
										</td>
										<td>
											ante
										</td>
									</tr>
									<tr>
										<td>
											1,004
										</td>
										<td>
											dapibus
										</td>
										<td>
											diam
										</td>
										<td>
											Sed
										</td>
										<td>
											nisi
										</td>
									</tr>
									<tr>
										<td>
											1,005
										</td>
										<td>
											Nulla
										</td>
										<td>
											quis
										</td>
										<td>
											sem
										</td>
										<td>
											at
										</td>
									</tr>
									<tr>
										<td>
											1,006
										</td>
										<td>
											nibh
										</td>
										<td>
											elementum
										</td>
										<td>
											imperdiet
										</td>
										<td>
											Duis
										</td>
									</tr>
									<tr>
										<td>
											1,007
										</td>
										<td>
											sagittis
										</td>
										<td>
											ipsum
										</td>
										<td>
											Praesent
										</td>
										<td>
											mauris
										</td>
									</tr>
									<tr>
										<td>
											1,008
										</td>
										<td>
											Fusce
										</td>
										<td>
											nec
										</td>
										<td>
											tellus
										</td>
										<td>
											sed
										</td>
									</tr>
									<tr>
										<td>
											1,009
										</td>
										<td>
											augue
										</td>
										<td>
											semper
										</td>
										<td>
											porta
										</td>
										<td>
											Mauris
										</td>
									</tr>
									<tr>
										<td>
											1,010
										</td>
										<td>
											massa
										</td>
										<td>
											Vestibulum
										</td>
										<td>
											lacinia
										</td>
										<td>
											arcu
										</td>
									</tr>
									<tr>
										<td>
											1,011
										</td>
										<td>
											eget
										</td>
										<td>
											nulla
										</td>
										<td>
											Class
										</td>
										<td>
											aptent
										</td>
									</tr>
									<tr>
										<td>
											1,012
										</td>
										<td>
											taciti
										</td>
										<td>
											sociosqu
										</td>
										<td>
											ad
										</td>
										<td>
											litora
										</td>
									</tr>
									<tr>
										<td>
											1,013
										</td>
										<td>
											torquent
										</td>
										<td>
											per
										</td>
										<td>
											conubia
										</td>
										<td>
											nostra
										</td>
									</tr>
									<tr>
										<td>
											1,014
										</td>
										<td>
											per
										</td>
										<td>
											inceptos
										</td>
										<td>
											himenaeos
										</td>
										<td>
											Curabitur
										</td>
									</tr>
									<tr>
										<td>
											1,015
										</td>
										<td>
											sodales
										</td>
										<td>
											ligula
										</td>
										<td>
											in
										</td>
										<td>
											libero
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div></div>`
 
    }
    

    public function mod_name()
    {
      echo `<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-xs-3">
			 <address> <strong>Twitter, Inc.</strong><br /> 795 Folsom Ave, Suite 600<br /> San Francisco, CA 94107<br /> <abbr title="Phone">P:</abbr> (123) 456-7890</address>
		</div>
		<div class="col-xs-9">
			<ol>
				<li>
					Lorem ipsum dolor sit amet
				</li>
				<li>
					Consectetur adipiscing elit
				</li>
				<li>
					Integer molestie lorem at massa
				</li>
				<li>
					Facilisis in pretium nisl aliquet
				</li>
				<li>
					Nulla volutpat aliquam velit
				</li>
				<li>
					Faucibus porta lacus fringilla vel
				</li>
				<li>
					Aenean sit amet erat nunc
				</li>
				<li>
					Eget porttitor lorem
				</li>
			</ol>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
			<h3>
				h3. Lorem ipsum dolor sit amet.
			</h3>
		</div>
		<div class="col-xs-4">
			<div class="bs-example">
				<div class="color-swatches">
					<div class="color-swatch brand-primary">
					</div>
					<div class="color-swatch brand-success">
					</div>
					<div class="color-swatch brand-info">
					</div>
					<div class="color-swatch brand-warning">
					</div>
					<div class="color-swatch brand-danger">
					</div>
				</div><br />
				<div class="color-swatches">
					<div class="color-swatch gray-darker">
					</div>
					<div class="color-swatch gray-dark">
					</div>
					<div class="color-swatch gray">
					</div>
					<div class="color-swatch gray-light">
					</div>
					<div class="color-swatch gray-lighter">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
						<h1 class="page-header">
							Dashboard
						</h1>
						<div class="row placeholders">
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
							<div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
								<img class="img-responsive" alt="Generic placeholder thumbnail" />
								<h4>
									Label
								</h4> <span id="dashboard" class="text-muted">Something else</span>
							</div>
						</div>
						<h2 class="sub-header">
							Section title
						</h2>
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>
											#
										</th>
										<th>
											Header
										</th>
										<th>
											Header
										</th>
										<th>
											Header
										</th>
										<th>
											Header
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1,001
										</td>
										<td>
											Lorem
										</td>
										<td>
											ipsum
										</td>
										<td>
											dolor
										</td>
										<td>
											sit
										</td>
									</tr>
									<tr>
										<td>
											1,002
										</td>
										<td>
											amet
										</td>
										<td>
											consectetur
										</td>
										<td>
											adipiscing
										</td>
										<td>
											elit
										</td>
									</tr>
									<tr>
										<td>
											1,003
										</td>
										<td>
											Integer
										</td>
										<td>
											nec
										</td>
										<td>
											odio
										</td>
										<td>
											Praesent
										</td>
									</tr>
									<tr>
										<td>
											1,003
										</td>
										<td>
											libero
										</td>
										<td>
											Sed
										</td>
										<td>
											cursus
										</td>
										<td>
											ante
										</td>
									</tr>
									<tr>
										<td>
											1,004
										</td>
										<td>
											dapibus
										</td>
										<td>
											diam
										</td>
										<td>
											Sed
										</td>
										<td>
											nisi
										</td>
									</tr>
									<tr>
										<td>
											1,005
										</td>
										<td>
											Nulla
										</td>
										<td>
											quis
										</td>
										<td>
											sem
										</td>
										<td>
											at
										</td>
									</tr>
									<tr>
										<td>
											1,006
										</td>
										<td>
											nibh
										</td>
										<td>
											elementum
										</td>
										<td>
											imperdiet
										</td>
										<td>
											Duis
										</td>
									</tr>
									<tr>
										<td>
											1,007
										</td>
										<td>
											sagittis
										</td>
										<td>
											ipsum
										</td>
										<td>
											Praesent
										</td>
										<td>
											mauris
										</td>
									</tr>
									<tr>
										<td>
											1,008
										</td>
										<td>
											Fusce
										</td>
										<td>
											nec
										</td>
										<td>
											tellus
										</td>
										<td>
											sed
										</td>
									</tr>
									<tr>
										<td>
											1,009
										</td>
										<td>
											augue
										</td>
										<td>
											semper
										</td>
										<td>
											porta
										</td>
										<td>
											Mauris
										</td>
									</tr>
									<tr>
										<td>
											1,010
										</td>
										<td>
											massa
										</td>
										<td>
											Vestibulum
										</td>
										<td>
											lacinia
										</td>
										<td>
											arcu
										</td>
									</tr>
									<tr>
										<td>
											1,011
										</td>
										<td>
											eget
										</td>
										<td>
											nulla
										</td>
										<td>
											Class
										</td>
										<td>
											aptent
										</td>
									</tr>
									<tr>
										<td>
											1,012
										</td>
										<td>
											taciti
										</td>
										<td>
											sociosqu
										</td>
										<td>
											ad
										</td>
										<td>
											litora
										</td>
									</tr>
									<tr>
										<td>
											1,013
										</td>
										<td>
											torquent
										</td>
										<td>
											per
										</td>
										<td>
											conubia
										</td>
										<td>
											nostra
										</td>
									</tr>
									<tr>
										<td>
											1,014
										</td>
										<td>
											per
										</td>
										<td>
											inceptos
										</td>
										<td>
											himenaeos
										</td>
										<td>
											Curabitur
										</td>
									</tr>
									<tr>
										<td>
											1,015
										</td>
										<td>
											sodales
										</td>
										<td>
											ligula
										</td>
										<td>
											in
										</td>
										<td>
											libero
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>`;
    }
     
    
}`