import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { InicioComponent } from './inicio/inicio.component';
import { MarcadorComponent } from './marcador/marcador.component';

export const routes: Routes = [
  {
    path: '',
    component: InicioComponent
  },
  {
    path: 'marcador',
    component: MarcadorComponent
  }
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule { }

