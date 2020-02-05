import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrMaskerModule } from 'br-mask';

import { IonicModule } from '@ionic/angular';

import { CadastrolojaPageRoutingModule } from './cadastroloja-routing.module';

import { CadastrolojaPage } from './cadastroloja.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    CadastrolojaPageRoutingModule,
    ReactiveFormsModule,
    BrMaskerModule
  ],
  declarations: [CadastrolojaPage]
})
export class CadastrolojaPageModule {}
