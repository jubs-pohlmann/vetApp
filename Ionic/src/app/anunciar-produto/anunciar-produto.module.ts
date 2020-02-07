import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { BrMaskerModule } from 'br-mask';
import { IonicModule } from '@ionic/angular';

import { AnunciarProdutoPageRoutingModule } from './anunciar-produto-routing.module';

import { AnunciarProdutoPage } from './anunciar-produto.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    AnunciarProdutoPageRoutingModule,
    ReactiveFormsModule,
    BrMaskerModule
  ],
  declarations: [AnunciarProdutoPage]
})
export class AnunciarProdutoPageModule {}
