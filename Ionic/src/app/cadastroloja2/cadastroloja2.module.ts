import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { Cadastroloja2PageRoutingModule } from './cadastroloja2-routing.module';

import { Cadastroloja2Page } from './cadastroloja2.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    Cadastroloja2PageRoutingModule
  ],
  declarations: [Cadastroloja2Page]
})
export class Cadastroloja2PageModule {}
