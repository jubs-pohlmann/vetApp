import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-produto',
  templateUrl: './produto.component.html',
  styleUrls: ['./produto.component.scss'],
})
export class ProdutoComponent implements OnInit {

  @Input() prodObj = { }


  constructor(public router:Router) { }

  public categoriaClick( i:string ){
    this.router.navigate(['tabs/produto', {produtoCategoria: i}]);
  }

  ngOnInit() {}

}
