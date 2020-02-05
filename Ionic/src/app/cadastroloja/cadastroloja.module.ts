import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { CadastrolojaPageRoutingModule } from './cadastroloja-routing.module';

import { CadastrolojaPage } from './cadastroloja.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CadastrolojaPageRoutingModule,
    ReactiveFormsModule
  ],
  declarations: [CadastrolojaPage]
})
export class CadastrolojaPageModule {}
