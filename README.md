# Overovani mac adres
Tento kód vytvoří novou instanci frameworku Slim pro PHP a definuje jednu POST rutu pro endpoint "/verify_mac".

V této rutě se nejprve získávají data odeslaná v těle požadavku pomocí $request->getParsedBody(). Tyto data se ukládají do proměnných $mac a $signature.

Poté se kontroluje, zda byly v požadavku uvedené hodnoty $mac a $signature, pokud ne, vrátí se chybová odpověď s kódem 400.

Následně se vytvoří nový podpis pomocí hash_hmac() s algoritmem sha256, který se použije k ověření, zda podpis v požadavku odpovídá původnímu podpisu. Pokud se podpisy neshodují, vrátí se chybová odpověď s kódem 401.

Pokud podpis platí, můžeme například ověřit Mac adresu v databázi a vrátit odpovídající informace.

Na konci se volá metoda run() pro spuštění aplikace.
