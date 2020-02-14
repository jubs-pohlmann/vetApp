import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { HomecategoriaPage } from './homecategoria.page';

const routes: Routes = [
  {
    path: '',
    component: HomecategoriaPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class HomecategoriaPageRoutingModule {}
