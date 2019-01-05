<?php

namespace App\Http\Controllers;

use App\Models\AuthApi;
use function GuzzleHttp\json_decode;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

class ProductController extends Controller
{
    private $token;

    public function __construct()
    {
        $auth = new AuthApi;
        $this->token = $auth->getToken();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guzzle = new Guzzle;

        $result = $guzzle->get(URL_API.'products',[
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ],
        ]);
        $products = json_decode($result->getBody())->data;
      
        $title = "Listagem dos produtos";

        return view('testes-api.produtos.index',compact('products','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastro novo produto';
        return view('testes-api.produtos.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = $request->except('_token');
        $guzzle = new Guzzle;
        $response = $guzzle->request('POST', URL_API . 'products', [
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ],
            'form_params' => $dataForm,
        ]);
        //dd(json_decode($response->getBody()));
        return redirect()
            ->route('products.index')
            ->with('success', 'Cadastro Realizado Com Sucesso');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guzzle = new Guzzle;
        
        try{
            $response = $guzzle->request('GET', URL_API . "products/{$id}", [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                ],
                "http_errors" => false,
    
            ]);
    
            $product = json_decode($response->getBody())->data;
    
            $title = "Detalhes do Produtos:  {$product->nome}";
    
            return view('testes-api.produtos.show', compact('product','title'));
            //dd(json_decode($response->getBody()));
        }catch(ClientException $e){
            $responseBody = $e->getResponse();
            
            dd($responseBody);
        }catch (RequestException $e) {
            $responseBody = $e->getResponse();
            
            dd($responseBody);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guzzle = new Guzzle;
        
        try{
            $response = $guzzle->request('GET', URL_API . "products/{$id}", [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                ],
                "http_errors" => false,
    
            ]);
    
            $product = json_decode($response->getBody())->data;
    
            $title = "Editar Produtos:  {$product->nome}";
    
            return view('testes-api.produtos.edit', compact('product','title'));
            //dd(json_decode($response->getBody()));
        }catch(ClientException $e){
            $responseBody = $e->getResponse();
            
            dd($responseBody);
        }catch (RequestException $e) {
            $responseBody = $e->getResponse();
            
            dd($responseBody);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->except('_token');
        $guzzle = new Guzzle;
        $response = $guzzle->request('PUT', URL_API . "products/{$id}", [
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ],
            'form_params' => $dataForm,
        ]);
        return redirect()
            ->route('products.index')
            ->with('success', 'Produto alterado Com Sucesso');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guzzle = new Guzzle;
        $response = $guzzle->request('DELETE', URL_API . "products/{$id}", [
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ],
        ]);
        return redirect()
            ->route('products.index')
            ->with('success', 'Produto Deletado Com Sucesso');
    }

    public function paginate($page)
    {
        $guzzle = new Guzzle;

        $result = $guzzle->get(URL_API."products?page={$page}",[
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
            ],
        ]);
        $products = json_decode($result->getBody())->data;
      
        $title = "Listagem dos produtos";

        return view('testes-api.produtos.index',compact('products',"title"));   
    }
}
