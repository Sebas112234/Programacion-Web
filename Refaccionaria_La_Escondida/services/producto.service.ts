import {Injectable} from '@angular/core';
import {Product} from '../models/producto.model';

@Injectable({providedIn: 'root'})
export class ProductoService {
  private readonly products: Product[] = [
    {
        id: 1,
        name: 'Bujía NGK',
        price: 150,
        imageUrl: 'assets/images/bujia-ngk.jpg',
        category: 'Bujías',
        description: 'Bujía de alta calidad NGK para motores de gasolina.',
        inStock: true,
    }
  ];

  getAll(): Product[] {
    return this.products;
  }
}