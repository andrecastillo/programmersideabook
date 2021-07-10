const readline = require('readline').createInterface({
    input: process.stdin,
    output: process.stdout,
});

// first going to make it easy and get stuff done with just these two fractions,
// and I'm gonna work on addition only for right now
var frac1_numerator = 1;
var frac1_denominator = 2;
var frac2_numerator = 1;
var frac2_denominator = 2;

addFractions();

function addFractions() {
    // need to find the least common denominator
    let numerator_sum;
    let least_common_denominator = lcd(frac1_denominator, frac2_denominator);

    if(least_common_denominator) {
        // with the lcd, now we have to add the numerators
        let new_numerator_frac1 = frac1_numerator * least_common_denominator;
        let new_numerator_frac2 = frac2_numerator * least_common_denominator;
        numerator_sum = new_numerator_frac1 + new_numerator_frac2;
    } else {
        least_common_denominator = frac1_denominator;
        numerator_sum = frac1_numerator + frac2_numerator;
    }
    console.log(`${numerator_sum}/${least_common_denominator}`);
}

function lcd(d1,d2) {
    // check if they're the same first
    // for now we're going to assume they're always the same
    if(d1 === d2)
        return false;
}
