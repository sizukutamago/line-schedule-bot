# フォルダ構成

## Adapters
永続化や入出力など

## UseCases
UseCase Interface
Request ResponseなどのDTOもここ

## Domain
### Application
UseCaseの実体

### Entities
Entity

# 処理の流れ
controllerでRequest DTOに変換してUseCasesごとに割り振り

UseCase内でEntity生成や永続化をおこなう
Adapterを使用する場合は、依存しないようにinterfaceを使用
Response DTOを利用してcontrollerに戻す
