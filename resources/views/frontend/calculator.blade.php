@extends('frontend.master')

@section('style')
<style>
    #calculator{
        width: 250px;
        height: 380px;
        padding: 20px;
        border: 1px solid black;
        background-color: rgb(176, 144, 206);
    }
    .row{
        padding:10px;
    }
    .btn{
        width: 35px;height: 35px;
        padding:5px;
        background-color: black; color: white;
        font-weight: bold;
        border: 2px solid gold;
    }
    .output{
         width: 190px;
         height: 30px;
         padding: 10px;
         font-weight: bold;
         border: 1px solid rgb(238, 235, 235);
         color:white;
         text-align: right;
    }
    .output2{
         width: 200px;
         padding: 10px;
         font-weight: bold;
         color:white;
    }
</style>
@endsection    

@section('main')
<div class="wrap-breadcrumb">
    <ul>
        <li class="item-link"><a href="#" class="link">home</a></li>
        <li class="item-link"><span>This was my first testing js code</span></li>
    </ul>
</div>
    
<div id="calculator">

    <p class="output2" id="output2" >Welcome to my caculator</p>
    <p class="output" id="output" ></p>
    
    <div class="row">
    <button class="btn" onclick="press(1);">1</button>
    <button class="btn" onclick="press(2);">2</button>
    <button class="btn" onclick="press(3);">3</button>
    <button class="btn" style="background-color: blue;" onclick="operator('/');">/</button>
    <button class="btn" style="background-color: red;" onclick="clr();">C</button>
    </div>
    <div class="row">
        <button class="btn" onclick="press(4);">4</button>
        <button class="btn" onclick="press(5);">5</button>
        <button class="btn" onclick="press(6);">6</button>
        <button class="btn" style="background-color: blue;" onclick="operator('*');">*</button>
        <button class="btn" style="background-color: red;" onclick="del();">Del</button>
        </div>
        <div class="row">
            <button class="btn" onclick="press(7);">7</button>
            <button class="btn" onclick="press(8);">8</button>
            <button class="btn" onclick="press(9);">9</button>
            <button class="btn" style="background-color: blue;" onclick="operator('-');">-</button>
            <button class="btn" style="background-color: blue;" onclick="operator('^');" title="Power">^</button>
            </div>
            <div class="row">
                <button class="btn" onclick="press(0);">0</button>
                <button class="btn" onclick="press('.');">.</button>
                <button class="btn" style="background-color: green;" onclick="equal();">=</button>
                <button class="btn" style="background-color: blue;" onclick="operator('+');">+</button>
                <button class="btn" style="background-color: blue;" onclick="sqrt();">sqrt</button>
                </div>
            
</div>
    
    
@section('script')
<script>
    let num1;
    let opt;
    let num2;
    function press(n){
        let val=document.getElementById("output").innerText;
        val=val+n;
        document.getElementById("output").innerText=val;
    }
    function operator(o){
        if(opt==null){
        opt=o;
        num1=parseFloat( document.getElementById("output").innerText);
        document.getElementById("output").innerText='';
        document.getElementById("output2").innerText=num1+o;
        }
    }
    function equal(){
        let out;
        num2=parseFloat( document.getElementById("output").innerText );
            switch(opt){
            case '+':  out=num1+num2; break; 
            case '-':  out=num1-num2; break; 
            case '*':  out=num1*num2; break; 
            case '/':  out=num1/num2; break; 
            case '^':  out=Math.pow(num1,num2); break; 
            
        }
        
        opt=null;
        document.getElementById("output").innerText=out ;
        document.getElementById("output2").innerText='Your answer is';
        
    }
    function sqrt(){
        let num=document.getElementById("output").innerText;
        sq=Math.sqrt(num);
        document.getElementById("output").innerText=sq;
        document.getElementById("output2").innerText='Square root of '+num;
    }
    function clr(){
        num1=0;
        num2=0;
        opt=null;
        document.getElementById("output").innerText='';
        document.getElementById("output2").innerText='Welcome to my Calculator';
        
    }
    function del(){
        let n= document.getElementById("output").innerText;
        n=n.slice(0,n.length-1);
        document.getElementById("output").innerText=n;
        
    }
    </script>
@endsection

@endsection