import { Component, computed } from '@angular/core';
import { toSignal } from '@angular/core/rxjs-interop';
import { ProductsService } from '../../services/producto.service';
import { ProductCardComponent } from '../product-card/product-card';

@Component({
  selector: 'app-catalogo',
  standalone: true,
  imports: [ProductCardComponent],
  templateUrl: './catalogo.html',
  styleUrls: ['./catalogo.css'],
})
export class CatalogoComponent {
  products;

  constructor(private productsService: ProductsService) {
    this.products = toSignal(this.productsService.getAll(), { initialValue: [] });
  }
}
