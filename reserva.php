<section class="bg-lightGray">
	<div class="container">
		<div class="row align-items-center">

			<div class="col-md-6 col-xl-5 mb-4 mb-md-0">
				<div class="section-intro">
					<h4 class="intro-title">Reservas</h4>
					<h2 class="mb-3">Venha nos fazer uma visita!</h2>
				</div>
				
				<p>O restaurante Prato Bom é o ambiente certo pra você, seu amigos e toda sua família. O seu momento certo é aqui!</p>

				<ul>
					<li><strong>Segunda à domingo</strong> 09:00 - 22:00</li>
				</ul>
			</div>

			<div class="col-md-6 offset-xl-2 col-xl-5">
				<div class="search-wrapper">
					<h3>Reservar uma mesa</h3>

					<form class="search-form" action="reservar" method="POST">
						<div class="form-group">
							<div class="input-group">
								<input name="Nome" type="text" class="form-control" maxlength="100" placeholder="Seu nome completo" required>
								<div class="input-group-append">
									<span class="input-group-text"><i class="ti-user"></i></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<input name="Email" type="email" class="form-control" placeholder="E-mail" required>
								<div class="input-group-append">
									<span class="input-group-text"><i class="ti-email"></i></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<input name="Telefone" type="text" class="form-control" placeholder="Número de contato" maxlength="16" 
									required data-mask="(00) 0 0000-0000"
								/>

								<div class="input-group-append">
									<span class="input-group-text"><i class="ti-headphone-alt"></i></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<input name="Data" type="date" class="form-control" placeholder="Data" required
								min="<?php echo date('Y-m-d') ?>"
							/>
						</div>

						<div class="form-group">
							<input name="Hora" type="time" class="form-control" placeholder="Hora" required
								min="09:00" max="22:00"
							/>
						</div>

						<div class="form-group">
							<div class="input-group">
								<input name="qtdPessoas" type="number" class="form-control" placeholder="Quantidade de pessoas" required
									min="1" max="99" data-mask="00"
								/>
								<div class="input-group-append">
									<span class="input-group-text"><i class="ti-bar-chart"></i></span>
								</div>
							</div>
						</div>

						<div class="form-group form-group-position">
							<button class="button border-0" type="submit">Reservar mesa</button>
						</div>
					</form>

	
					<div class="row">
						<div class="col-12">
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								Aqui adicionar Mensagem de sucesso

								<button class="close" type="button" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								Aqui adicionar mensagem de error

								<button class="close" type="button" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>

<style>
	input::-webkit-calendar-picker-indicator {
		filter: invert(60%);
		margin-right: 4px;
	}
</style>

<script type="text/javascript" src="/assets/vendors/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>