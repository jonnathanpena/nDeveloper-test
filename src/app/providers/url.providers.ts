import { Injectable } from '@angular/core';

@Injectable()
export class ULRProvider {

  public dominio: String = 'https://innovatuestilo.com/voleibol/api/';

  /*Equipo*/
  public getEquipoById() {
    return this.dominio + 'equipo/getById.php';
  }

  public getEquipoByName() {
    return this.dominio + 'equipo/getByName.php';
  }

  public insertEquipo() {
    return this.dominio + 'equipo/insert.php';
  }

  /* Juego */
  public insertJuego() {
    this.dominio + 'juego/insert.php';
  }

  /* Set */
  public getSetByJuego() {
    this.dominio + 'set/getByJuego.php';
  }

  public insertSet() {
    this.dominio + 'set/insert.php';
  }

  public updateGanador() {
    this.dominio + 'set/updateGanador.php';
  }

  public updatePunto() {
    this.dominio + 'set/updatePunto.php';
  }

}
