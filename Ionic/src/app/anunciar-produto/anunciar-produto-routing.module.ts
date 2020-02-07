import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AnunciarProdutoPage } from './anunciar-produto.page';

const routes: Routes = [
  {
    path: '',
    component: AnunciarProdutoPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AnunciarProdutoPageRoutingModule {}
