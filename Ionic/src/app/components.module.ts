import { NgModule } from '@angular/core';
import { ProdutoComponent } from './components/produto/produto.component';
import { IonicModule } from '@ionic/angular';

@NgModule({
  imports: [IonicModule],
  declarations: [ProdutoComponent],
  exports: [ProdutoComponent]
})

export class ComponentsModule{}
