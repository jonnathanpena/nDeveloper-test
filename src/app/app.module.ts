import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app.routing.module';
import { ULRProvider } from './providers/url.providers';

import { AppComponent } from './app.component';
import { InicioComponent } from './inicio/inicio.component';
import { MarcadorComponent } from './marcador/marcador.component';

@NgModule({
  declarations: [
    AppComponent,
    InicioComponent,
    MarcadorComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [
    ULRProvider
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
