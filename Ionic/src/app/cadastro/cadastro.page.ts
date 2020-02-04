import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';


@Component({
  selector: 'app-cadastro',
  templateUrl: './cadastro.page.html',
  styleUrls: ['./cadastro.page.scss'],
})
export class CadastroPage implements OnInit {
//AULA!!
	registerForm: FormGroup;

	constructor(public formbuilder: FormBuilder) { 
		this.registerForm = this.formbuilder.group({
			name: [null, [Validators.required, Validators.minLength(3)]],
			password: [null, [Validators.required, Validators.minLength(6)]],
			email: [null, [Validators.required, Validators.email]],
			phone: [null, [Validators.required]]
			//birthdate: [null, [Validators.required, Validators.date]]
		});
	}
	
	submitForm(form) {
		console.log(form);
		console.log(form.value);
	}

  /* constructor(formBuilder) { }
	this.validations_form = this.formBuilder.group({
		nome: new FormControl('', Validators.required),
		email: new FormControl('', Validators.compose([
			Validators.required,
			Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')
		]))
	}); */
	
  ngOnInit() {
  }

}
