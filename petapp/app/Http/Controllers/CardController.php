<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardController extends Controller
{
  //Método responsável por criar novo cartão
  public function createCard(Request $request){

    $card = new Card;

    $card->card_number = $request->card_number;
    $card->cvv = $request->cvv;
    $card->holder = $request->holder;
    $card->expiration_date = $request->expiration_date;
    $card->save();

    return response()->json([$card]);
  }

  //Método que retorna lista com todos os cartões
  public function listCard(){
    $card = Card::all();
    return response()->json($card);
  }

  //Método responsavel por exibir o cartão com o id informado
  public function showCard($id){
    $card = Card::findOrFail($id);
    return response()->json([$card]);
  }

  //Método usado para deletar um cartão
  public function deleteCard($id){
    Card::destroy($id);
    return response()->json(['Cartao deletado']);
  }

  //Método para edição de dados do cartão
  public function updateCard(Request $request, $id){
    $card = Card::find($id);
    if($card){
      if($request->card_number){
        $card->card_number = $request->card_number;
      }
      if($request->cvv){
        $card->cvv = $request->cvv;
      }
      if($request->holder){
        $card->holder = $request->holder;
      }
      if($request->expiration_date){
        $card->expiration_date = $request->expiration_date;
      }
      $card->save();
      return response()->json([$card]);
    }
    else{
      return response()->json(['Este cartão nao existe']);
    }
  }
}
