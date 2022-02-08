<script>
    function run() {
        var foo = "Foo";
        let bar = "Bar";

        console.log(foo, bar); // Foo Bar

        {
            var moo = "Mooo"
            let baz = "Bazz";
            console.log(moo, baz); // Mooo Bazz
        }

        console.log(moo); // Mooo
        console.log(baz); // ReferenceError
    }
console.log(foo);
        run();
</script>
