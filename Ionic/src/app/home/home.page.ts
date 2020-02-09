import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})
export class HomePage implements OnInit {

  constructor(public router: Router) { }

  categoriaClick(){
    this.router.navigateByUrl('tabs/homecategoria');
  }

  ngOnInit() {
  }
  produtos= [{
    name: 'ração eca',
    description: 'muito ecaa aaaaaaaaaaaaaaaaaaaaaa',
    price: 112,
    photo: null,
    animal: "cats",

  },
  {
    name: 'ração boa',
    description: 'muito boaaa aaaaaaaaaaaaaaaaaaaaaa',
    price: 11230124,
    photo: null,
    animal: "dogs",

  },
  {
  name: 'ração media',
    description: 'muito boaaa aaaaaaaaaaaaaaaaaaaaaa',
    price: 11230124,
    photo: null,
    animal: "cats",

  }
]
 
}
