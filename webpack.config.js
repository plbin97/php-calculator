const path = require('path');
module.exports = {
    devtool: "source-map", // Enable source map for debugging
    entry: './index.js',  // Entry file

    output: {  // compiled file in ./dist
        path: path.resolve(__dirname, 'dist'),
        filename: 'calculator.js'
    },
    module: {
        rules: [
            { // model for sass
                test: /\.css$/,
                use: [
                    "style-loader",
                    "css-loader",
                ]
            },
            {
                test: /\.m?js$/,
                exclude: /(node_modules|bower_components)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.js$/,
                use: ["source-map-loader"],
                enforce: "pre"
            }
        ]
    },
};