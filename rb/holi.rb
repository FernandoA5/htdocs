class HolaMundo
    def inicialize
    end
    def main()
        menu=0
        loop do
            #sleep 1
        system "cls"
        
        puts "¿Qué programa deseas ejecutar?"
        programa=gets().to_i
        case programa
        when 1
            sumaDosNumeros()
        when 2
            ganadorEquipoFutbol()
        when 3
            sumarMultiplicar()
        when 4
            calculadora()
        when 5
            tresAlumnos()
        else
            exit
        end
        puts "¿Salir? Y=1 N=0"
        menu=gets().to_i
        break if menu==1
        end
        exit
        
        #puts "El resultado de la sua de #{a} + #{b} es: #{c}"         
    end
    def sumaDosNumeros
        puts "¿Cual es el primer valor?"
        a= gets().to_i
        puts "¿Cual es el segundo valor?"
        b=gets().to_i
        c=a+b
        puts "La respuesta es #{c}"
    end
    def ganadorEquipoFutbol
        puts "¿Cuántas anotaciones hizo el primer equípo?"
        team1=gets().to_i
        puts "¿Cuántas anotaciones hizo el segundo equípo"
        team2=gets().to_i
        if team1>team2
            puts "¡ganó el primer equípo!"
        elsif team1<team2
            puts "¡ganó el segundo equípo!"
        else
            puts "Ninguno ganó"
        end
    end
    def sumarMultiplicar
        puts "introduce un valor"
        num1=gets().to_i
        puts "introduce otro valor"
        num2=gets().to_i
        puts "¿sumar o multiplicar?  +:1 || *:2"
        op=gets().to_i
        if op==1
            r=num1+num2
        elsif op==2
            r=num1*num2
        end
        puts r
    end
    def calculadora
        puts "ingresa los dos numeros"
        n1, n2=gets().to_i, gets().to_i
        puts "¿Qué operacion deséa hacer? 1:+; 2:-; 3:*; 4:/;"
        op=gets().to_i
        case op
        when 1
            r=n1+n2
        when 2 
            r=n1-n2
        when 3
            r=n1*n2
        when 4
            r=n1/n2
        end
        puts r
    end
    def tresAlumnos
        nombres=[]
        matriculas=[]
        calificaciones=[]
        for i in 1..3
            puts "¿Nombre del primer alumno?"
            nombres[i]=gets().to_i
            puts "¿Matricula de alumno?"
            matriculas[i]=gets().to_i
            puts "¿Calificación?"
            calificaciones[i]=gets().to_i
            if calificaciones>10
                puts "Calificacion maxima es 10"
                redo
            end
        end

    end
end
#Creado objeto Clase
=begin
=end
objeto = HolaMundo.new()
objeto.main()
gets()