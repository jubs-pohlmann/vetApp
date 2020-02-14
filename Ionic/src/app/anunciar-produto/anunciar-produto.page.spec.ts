import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { AnunciarProdutoPage } from './anunciar-produto.page';

describe('AnunciarProdutoPage', () => {
  let component: AnunciarProdutoPage;
  let fixture: ComponentFixture<AnunciarProdutoPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AnunciarProdutoPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(AnunciarProdutoPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
